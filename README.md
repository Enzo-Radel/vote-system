## Configurar Mysql
    <pre>
        CREATE DATABASE vote_system;
        CREATE USER 'vs_user'@'localhost' IDENTIFIED BY mysql_native_password 'vs_pass';
        GRANT ALL PRIVILEGES ON vote_system. * TO ‘vs_user’@‘localhost’
        FLUSH PRIVILEGES
    </pre>
    
## Configurar Laravel
    <pre>
        composer update
    </pre>
    <p>
        Copiar .env.example para .env
        Dentro de .env
            - DB_DATABASE=vote_system
            - DB_USERNAME=vs_user
            - DB_PASSWORD=vs_pass
    </p>
    <pre>
        php artisan key:generate
        php artisan migrate
        php artisan db:seed
        npm install
        npm run dev
        php artisan serve
    </pre>
    <p>Por fim acesse a porta do localhost mostrada</p>
