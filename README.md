<h2> Configurar o MySql</h2>
<pre>
    CREATE DATABASE vote_system;
    CREATE USER 'vs_user'@'localhost' IDENTIFIED BY mysql_native_password 'vs_pass';
    GRANT ALL PRIVILEGES ON vote_system. * TO ‘vs_user’@‘localhost’
    FLUSH PRIVILEGES
</pre>
<hr>
<h2> Configurar o Laravel </h2>

<pre>
    composer update
</pre>

<p>Agora copie o arquivo .env.example para .env</p>
<p>Após isso acesse o arquivo .env e mude os valores das seguintes chaves</p>
        
<pre>
    DB_DATABASE=vote_system
    DB_USERNAME=vs_user
    DB_PASSWORD=vs_pass
</pre>

<p>Agora basta executar os seguintes comandos na ordem q são mostrados</p>

<pre>
    php artisan key:generate
    php artisan migrate
    php artisan db:seed
    npm install
    npm run dev
    php artisan serve
</pre>
<p>Por fim acesse a porta do localhost mostrada</p>
