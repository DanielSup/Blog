Instalace aplikace
========================
Pro spouštění aplikace použijeme lokální server lampp nebo xampp. Nejdříve je potřeba vytvořit složku blog a naklonovat si obsah repozitáře https://github.com/DanielSup/Blog.git.

Následně je potřeba vytvořit databázi s názvem articles v rozhraní phpmyadmin, které lze spustit na adrese localhost:8080/phpmyadmin

Poté v rozhraní phpmyadmin klikneme na nově vytvořenou databázi articles a následně zvolíme možnost, že v této databázi spustíme SQL příkaz. Do pole pro vyplnění SQL příkazu je potřeba nakopírovat obsah souboru articles.sql ve složce app/articlesDatabase. Klikneme na tlačítko Proveď a tabulka s články je vytvořena.

Po vytvoření databáze a tabulky s články v rozhraní phpmyadmin je potřeba upravit soubory parameters.yml a parameters.yml.dist v adresáři app/config. V těchto souborech změníme uživatelské jméno a heslo, pod kterým se připojujeme do databáze tak, aby přihlašovací údaje byly správné.
Máme-li například uživatelské jméno root a přihlašujeme se bez hesla, v souboru parameters.yml musí být tyto řádky:

    database_user: root
    
    database_password: null
    
a v souboru paremeters.yml.dist musí být obsaženy tyto řádky:

    database_user: root
    
    database_password: ~
    
Aplikaci máme v tuto chvíli nainstalovanou a můžeme si ji otestovat na adrese localhost:8080/blog/web

Pro vývoj aplikace byla použita verze PHP 5.6.
