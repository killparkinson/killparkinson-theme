# WordPress Development Setup with Docker & Child Theme `kp-theme`

This guide outlines how to set up a local development environment for the **`kp-theme`** child theme using Docker. The setup includes the **Bootscore parent theme**.

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

├── ./theme/       Bootscore child theme. Make changes here for development.
└── ./bootscore/  # Parent theme (Bootscore) is placed here after extraction.

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
