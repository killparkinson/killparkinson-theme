(() => {
  const { select, dispatch } = wp.data;
  const { parse, serialize } = wp.blocks;

  /**
   * Collects all non-empty text nodes from an element and its descendants
   * @param {Element} element - The element to traverse for text nodes
   * @returns {string[]} An array of non-empty text content strings from text nodes
   */
  function collectTextNodes(element) {
    const textNodes = [];
    const stack = [element];

    while (stack.length > 0) {
      const current = stack.pop();

      // check if current node is a TextNode and not empty
      if (current.nodeType === Node.TEXT_NODE) {
        const textContent = current.textContent.trim();

        if (textContent) {
          textNodes.push(textContent);
        }
      }

      // add all child nodes to stack for traversal
      if (current.childNodes) {
        for (let i = current.childNodes.length - 1; i >= 0; i--) {
          stack.push(current.childNodes[i]);
        }
      }
    }

    return textNodes;
  }

  /**
   * Displays a message in the designated message element with the specified type.
   * 
   * @param {string} message - The message text to display
   * @param {string} [type='success'] - The type of message (e.g., 'success', 'error', 'warning')
   * @param {number} [timeout=5000] - The notice timeout length
   */
  function displayMessage(message, type = 'success', timeout = 5000) {
    const boxElement = document.querySelector('#deepl_translate_box .inside')
    const displayMessageElement = document.createElement('div')

    boxElement.insertBefore(displayMessageElement, boxElement.firstChild)
    displayMessageElement.setAttribute('class', 'notice notice-' + type)
    displayMessageElement.textContent = message


    setTimeout(() => {
      displayMessageElement.remove()
    }, timeout)
  }

  const translateButton = document.getElementById('deepl-translate-button');

  if (translateButton) {
    translateButton.addEventListener('click', async () => {
      const editor = select('core/editor');

      if (!editor || !editor.getEditedPostAttribute) {
        return;
      }

      // get the current post content from the editor
      const currentContent = editor.getEditedPostAttribute('content');
      const contentContainer = document.createElement('div')

      contentContainer.innerHTML = currentContent

      // extract all text nodes from the content
      const text = collectTextNodes(contentContainer)

      // send the text to the translation API
      const response = await fetch('/?rest_route=/deepl-translation/v1/translate', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          text,
          target_lang: translateButton.dataset.targetLang
        })
      })

      if (response.ok) {
        try {
          const data = await response.json()

          if (data.status !== 'success') {
            return displayMessage(data.message, 'error')
          }

          // initialize variables for reconstructing the translated content
          let result = ''
          let originalContent = currentContent

          // process each translation and reconstruct the content
          for (let i = 0; i < data.translations.length; i++) {
            const { translation, original_text } = data.translations[i];
            const indexOf = originalContent.indexOf(original_text)
            const textLength = translation.length < original_text.length ? translation.length : original_text.length

            // add the portion of content before the translation
            result += originalContent.slice(0, indexOf) + translation

            // update the remaining content to process
            originalContent = originalContent.slice(indexOf + textLength)
          }

          // add any remaining content that wasn't translated
          if (originalContent.length) {
            result += originalContent
          }

          // parse the translated content into blocks
          const blocks = parse(result);

          // update the editor with the translated content
          dispatch('core/editor').editPost({
            content: serialize(blocks)
          });

          displayMessage('Translation successful!')
        } catch (error) {
          // displayMessage('error', error.message)
        }
      } else {
        displayMessage('An error occurred', 'error')
      }
    })
  }
})();
