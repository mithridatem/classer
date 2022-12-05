create database classer;
use classer;
create table article(
id_article int primary key auto_increment not null,
nom_article varchar(50)
)Engine=InnoDB;
create table categories(
id_cat int primary key auto_increment not null,
nom_cat varchar(50)
)Engine=InnoDB;

create table associer(
id_article int not null,
id_cat int not null,
primary key(id_article, id_cat)
)Engine=InnoDB;

alter table associer
add constraint fk_associer_article
foreign key(id_article)
references article(id_article);
alter table associer
add constraint fk_associer_categorie
foreign key(id_cat)
references categories(id_cat);