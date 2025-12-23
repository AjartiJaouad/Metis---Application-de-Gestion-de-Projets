use Metis ;
create table membres (
    id int auto_increment primary key ,
    nom varchar(50) not null ,
    email varchar(100) not null UNIQUE ,
    date_inscription date not null 
);