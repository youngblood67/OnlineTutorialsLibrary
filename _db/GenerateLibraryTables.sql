/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     25/12/2018 21:42:58                          */
/*==============================================================*/


drop table if exists BASKET;

drop table if exists COMMENT;

drop table if exists ONLINEVISUALIZATION;

drop table if exists SUBSCRIPTION;

drop table if exists TAG;

drop table if exists THEME;

drop table if exists USER;

drop table if exists USERSUBSCRIPTION;

drop table if exists VIDEO;

drop table if exists VIDEO_BASKET;

drop table if exists VIDEO_TAG;

drop table if exists VIDEO_THEME;

/*==============================================================*/
/* Table: BASKET                                                */
/*==============================================================*/
create table BASKET
(
   idBasket             int not null AUTO_INCREMENT,
   idUser              int not null,
   datePurchase         datetime,
   primary key (idBasket)
);

/*==============================================================*/
/* Table: COMMENT                                               */
/*==============================================================*/
create table COMMENT
(
   idComment            int not null AUTO_INCREMENT,
   idVideo              int not null,
   idUser               int not null,
   contentComment              text,
   ratingComment              int,
   primary key (idComment)
);

/*==============================================================*/
/* Table: ONLINEVISUALIZATION                                   */
/*==============================================================*/
create table ONLINEVISUALIZATION
(
   idUser               int not null,
   idVideo             int not null,
   dateVisu             datetime,
   primary key (idUser, idVideo)
);

/*==============================================================*/
/* Table: SUBSCRIPTION                                          */
/*==============================================================*/
create table SUBSCRIPTION
(
   idSubscription       int not null AUTO_INCREMENT,
   priceSubscription                float,
   durationSubscription             int,
   typeSubscription                 int,
   nbDaysTrial          int,
   primary key (idSubscription)
);

/*==============================================================*/
/* Table: TAG                                                   */
/*==============================================================*/
create table TAG
(
   idTag                int not null AUTO_INCREMENT,
   titleTag               varchar(200),
   primary key (idTag)
);

/*==============================================================*/
/* Table: THEME                                                 */
/*==============================================================*/
create table THEME
(
   idTheme              int not null AUTO_INCREMENT,
   titleTheme                varchar(200),
   primary key (idTheme)
);

/*==============================================================*/
/* Table: USER                                                  */
/*==============================================================*/
create table USER
(
   idUser               int not null AUTO_INCREMENT,
   lastname            varchar(50),
   firstname            varchar(50),
   password            varchar(200),
   email             varchar(50),
   primary key (idUser)
);

/*==============================================================*/
/* Table: USERSUBSCRIPTION                                      */
/*==============================================================*/
create table USERSUBSCRIPTION
(
   idUserSubscription   int not null AUTO_INCREMENT,
   idUser               int not null,
   idSubscription       int not null,
   startDate            datetime,
   primary key (idUserSubscription)
);

/*==============================================================*/
/* Table: VIDEO                                                 */
/*==============================================================*/
create table VIDEO
(
   idVideo              int not null AUTO_INCREMENT,
   titleVideo                varchar(200) not null,
   durationVideo             int,
   priceVideo                float,
   descriptionVideo          text,
   urlVideo					        varchar(200),
   idYoutube            varchar(50),
   authorVideo               varchar(200),
   primary key (idVideo)
);

/*==============================================================*/
/* Table: VIDEO_BASKET                                          */
/*==============================================================*/
create table VIDEO_BASKET
(
   idBasket             int not null,
   idVideo              int not null,
   primary key (idBasket, idVideo)
);

/*==============================================================*/
/* Table: VIDEO_TAG                                             */
/*==============================================================*/
create table VIDEO_TAG
(
   idTag                int not null,
   idVideo              int not null,
   primary key (idTag, idVideo)
);

/*==============================================================*/
/* Table: VIDEO_THEME                                           */
/*==============================================================*/
create table VIDEO_THEME
(
   idVideo              int not null,
   idTheme              int not null,
   primary key (idVideo, idTheme)
);

alter table BASKET add constraint FK_USER_BASKET foreign key (idUser)
      references USER (idUser) on delete restrict on update restrict;

alter table COMMENT add constraint FK_COMMENT_USER foreign key (idUser)
      references USER (idUser) on delete restrict on update restrict;

alter table COMMENT add constraint FK_VIDEO_COMMENT foreign key (idVideo)
      references VIDEO (idVideo) on delete restrict on update restrict;

alter table ONLINEVISUALIZATION add constraint FK_ONLINEVISUALIZATION foreign key (idUser)
      references USER (idUser) on delete restrict on update restrict;

alter table ONLINEVISUALIZATION add constraint FK_ONLINEVISUALIZATION2 foreign key (idVideo)
      references VIDEO (idVideo) on delete restrict on update restrict;

alter table USERSUBSCRIPTION add constraint FK_USERSUBSCRIPTION_SUBSCRIPTION foreign key (idSubscription)
      references SUBSCRIPTION (idSubscription) on delete restrict on update restrict;

alter table USERSUBSCRIPTION add constraint FK_USER_USERSUBSCRIPTION foreign key (idUser)
      references USER (idUser) on delete restrict on update restrict;

alter table VIDEO_BASKET add constraint FK_VIDEO_BASKET foreign key (idBasket)
      references BASKET (idBasket) on delete restrict on update restrict;

alter table VIDEO_BASKET add constraint FK_VIDEO_BASKET2 foreign key (idVideo)
      references VIDEO (idVideo) on delete restrict on update restrict;

alter table VIDEO_TAG add constraint FK_VIDEO_TAG foreign key (idTag)
      references TAG (idTag) on delete restrict on update restrict;

alter table VIDEO_TAG add constraint FK_VIDEO_TAG2 foreign key (idVideo)
      references VIDEO (idVideo) on delete restrict on update restrict;

alter table VIDEO_THEME add constraint FK_VIDEO_THEME foreign key (idVideo)
      references VIDEO (idVideo) on delete restrict on update restrict;

alter table VIDEO_THEME add constraint FK_VIDEO_THEME2 foreign key (idTheme)
      references THEME (idTheme) on delete restrict on update restrict;

