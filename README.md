# WordPress Development Setup with Docker & Child Theme `kp-theme`

This guide outlines how to set up a local development environment for the **`kp-theme`** child theme using Docker. The setup includes the **Bootscore parent theme** and a MariaDB database.

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

This will extract the **Bootscore** theme into the `./bootscore` directory.

```bash
unzip bootscore.zip -d ./bootscore
```

---

### 3. Start Docker Containers

```bash
docker-compose up -d
```

This command:
- Pulls the latest WordPress and MariaDB images.
- Starts a container with WordPress on port **8080** (`localhost:8080`).
- Sets up a database named `exampledb` with user `exampleuser`.

---

### 4. Access WordPress Admin

1. Open your browser and go to:
   ```
   http://localhost:8080
   ```
2. Log in with the default credentials:
   - **Username**: `admin`
   - **Password**: `password` (set via `docker-compose.yml`, change if needed)

---

### 5. Activate Themes

1. Go to **Appearance > Themes** in the WordPress admin.
2. Activate the **Bootscore** parent theme.
3. Then activate your child theme (**kp-theme**) from the same page.

> The child theme files are mounted at `./theme` and will be reflected in the container.

---

## Directory Structure

- **`./theme/`**: Your custom child theme (`kp-theme`). Make changes here for development.
- **`./bootscore/`**: Parent theme (Bootscore). Do not modify.

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
