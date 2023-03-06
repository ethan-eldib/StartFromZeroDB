### Database creation with sqlite3

### SQLite is already installed on Linux or macOS. To check if it's already installed, type the command:
```bash
sqlite3 --version
```

### For Windows you need to install it: https://sqlite.org/download.html

### Then type this command in your terminal to create your database
```bash
sqlite3 dragon_ball.db  
```

### Creation of the `personnage` table
```sql
CREATE TABLE IF NOT EXISTS personnage (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    nom TEXT,
    race TEXT,
    age INTEGER,
    technique TEXT,
    transformation TEXT,
    planet_origin TEXT,
    statut TEXT,
    story TEXT,
    apparition TEXT,
    doubling TEXT
)
```

### copy the .env.example file and paste it in the root of the project then rename the file to .env
#### configure environment variables
```dotenv
#sqlite
#DB_NAME=sqlite://<path_to_sqlite_file>
#DB_USER=root
#DB_PASSWORD=root

#mysql (DSN: "mysql:host=DB_HOST;dbname=DB_NAME")
#DB_HOST=localhost
#DB_NAME=
#DB_USERNAME=
#DB_PASSWORD=
```
