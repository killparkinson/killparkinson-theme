# WordPress Development Setup with Docker & Child Theme `kp-theme`

This guide outlines how to set up a local development environment for the **`kp-theme`** child theme using Docker. The setup includes the **Bootscore parent theme**.

## Design documentation

The design system [documentation](docs/README.md) covers how to build components and more.

## Getting Started

### 1. Clone the Repository

```bash
git clone git@github.com:killparkinson/killparkinson-theme.git
cd killparkinson-theme
```
---

### 2. Download the Parent Theme (Bootscore)

The parent theme is not included in version control. Download it from the official release:

```bash
wget https://github.com/bootscore/bootscore/releases/latest/download/bootscore.zip
```

This will extract the **Bootscore** theme into directory.

```bash
unzip bootscore.zip
```

---

### 3. Start Docker Containers

```bash
docker-compose up -d
```

This command:
- Pulls the latest WordPress and Mysql images.
- Starts a container with WordPress on port **8080** (`localhost:8080`).
- Sets up a database named `exampledb` with user `exampleuser`.

---

### 4. Access WordPress Admin

1. Open your browser and go to: http://localhost:8080
2. Select language and create admin acount:

---

### 5. Activate Themes

1. Go to **Appearance > Themes** in the WordPress admin.
2. Activate the **Bootscore** parent theme.
3. Then activate the child theme (**bootcore child**) from the same page.

---

## Directory Structure

```
├── ./theme/       Bootscore child theme.
└── ./bootscore/   Parent theme (Bootscore) is placed here after extraction.
```
---

## Debugging

WordPress is configured with `WP_DEBUG = true`, and logs are saved at:

```
/wp-content/debug.log
```

You can view the log file by accessing it via the browser or using Docker commands:

```bash
docker exec -it wordpress_container_id cat /var/www/html/wp-content/debug.log
```

> Replace `wordpress_container_id` with your actual container ID (run `docker ps` to find it).

## Cleanup

To stop and remove containers:

```bash
docker-compose down
```

To also remove volumes (database data will be lost):

```bash
docker-compose down -v
```

## Setup Sass lint

To set up Sass lint in your project using **stylelint** and the **stylelint-config-twbs-bootstrap** rules, follow these steps:

### Prerequisites

Ensure you have Node.js and npm installed on your system. You can download them from [https://nodejs.org](https://nodejs.org).

### Step 1: Install Dependencies

First, install the necessary dependencies by running the following command in your project directory:

```bash
npm install
```

This command will install all the required packages, including **stylelint** and **stylelint-config-twbs-bootstrap**, which are used for linting SASS files.

### Step 2: Run Lint

Once the dependencies are installed, you can run the linter by executing the following command:

```bash
npm run lint:scss
```

### Step 3: Fix Linting Errors

If you want to automatically fix any linting errors, run the following command:

```bash
npm run lint:scss:fix
```

This command will apply fixes to the SASS files based on the rules defined in your configuration. Note that not all linting issues can be automatically fixed, so you may need to manually review and correct some errors.

