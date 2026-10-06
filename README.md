1. Clone the repository from github 
```
git clone [repository link]
```
---

2. Install **vscode**.
```
winget install vscode
```

2.1. Install **git**.
```
winget install git.git -i
```
Add a Git Bash profile, set Vscode as the default editor and **make sure that git uses main, not master**. These are the only settings you may need to change.

2.2. Install **php**.
```
winget install PHP.PHP.8.5 
```
*Tip: Use `winget search php` to make sure you are installing the latest version.*

---

3. Install the Bun package manager.
```
powershell -c "irm bun.sh/install.ps1|iex"
```
3.1. After successfully installing Bun, it may prompt you to restart terminal. Restart terminal.

---

4. Install the Composer dependency manager for PHP via the download page:
https://getcomposer.org/download/

---

5. Change the directory to the project directory.
```
cd [name of the cloned repository] 
```
---

6. Use the following command to locate the `php.ini` file
```
where php
```
6.1. Through File Explorer, open the `php.ini` file using Vscode and enable the following extention on line **921**: `extension=fileinfo` by removing the comment.

---

7. Within the project directory run the following command to apply Composer to this project.
```
composer install
```
7.1. After successfully installing Composer, it may prompt you to restart terminal. Restart terminal.

---

8. Within the project directory run the following command to apply Bun to this project.
```
bun install
```
Tip: `bun i` works as well.

---

9. Create a new `.env` file by copying the `.env.example` file.

---

10. In the terminal, run the following command:
```
php artisan key:generate
```
what it does, is that it creates a random application key that will be stored in the `.env` file, under the `APP_KEY` variable.

---
11. In the terminal, run the following command:
```
php artisan migrate
```
This will execute all pending Laravel database migrations and update the database schema to match the app.'

11.1. If it says that *"The SQLite database configured does not exist"*, it will also ask whether you'd like to create a it, you should say **yes**.

---

12. In the terminal, run the following command:
```
composer run dev
```
This initiates all necessary services for local development at once, including a local server.

