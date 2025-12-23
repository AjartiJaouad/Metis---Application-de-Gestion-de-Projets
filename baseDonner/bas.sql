use Metis ;
create table membres (
    id int auto_increment primary key ,
    nom varchar(50) not null ,
    email varchar(100) not null UNIQUE ,
    date_inscription date not null 
);
create table  projets (
    id int AUTO_INCREMENT primary key ,
    titre varchar(150) not null,
    date_debut DATE not null,
    statut varchar(50) not null,
    membre_id INT not null,
    type varchar(30) not null,

    foreign key(membre_id)  references membres(id)
);
