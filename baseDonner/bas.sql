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
create table activité (
    id int auto_increment primary key ,
    descripption varchar(250) not null,
    dateActivite date not null ,
    statut varchar(100) not null ,
    projets_id int not null ,
    foreign key  (projets_id) references projets(id)
);
-- je va ajouter une colone a le tableux projets 
 alter table projets add duree int default null ;
 -- je va ajouter une colone a le tableux projets 

 alter table projets add budget int default null ;
