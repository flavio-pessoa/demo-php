/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     28/07/2017 16:51:45                          */
/*==============================================================*/

use demo_db;

drop table if exists funcionario;

drop table if exists departamento;

/*==============================================================*/
/* Table: departamento                                          */
/*==============================================================*/
create table departamento
(
   cod_departamento     integer not null auto_increment,
   nome_departamento    varchar(100) not null,
   status_departamento  char(1) not null,
   vlr_limite_departamento   double(11,2),
   primary key (cod_departamento)
)
engine=innodb DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*==============================================================*/
/* Table: funcionario                                           */
/*==============================================================*/
create table funcionario
(
   cod_funcionario      integer not null auto_increment,
   cod_departamento     integer not null,
   nome_funcionario     varchar(200) not null,   
   email_funcionario    varchar(100),
   login_funcionario    varchar(20) not null, 
   senha_funcionario    varchar(128) not null,   
   status_funcionario   char(1) not null,
   authKey_funcionario  varchar(128) not null,
   accessToken_funcionario  varchar(128) not null,
   primary key (cod_funcionario),
   constraint fk_departamento_funcionario foreign key (cod_departamento)
      references departamento (cod_departamento) on delete restrict on update restrict   
)
engine=innodb DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

