/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     25/12/2018 21:42:58                          */
/*==============================================================*/


drop table if exists COMMENT;

drop table if exists SUBSCRIPTION;

drop table if exists TAG;

drop table if exists THEME;

drop table if exists USER;

drop table if exists USERSUBSCRIPTION;

drop table if exists VIDEO;

drop table if exists VIDEO_BASKET;

drop table if exists VIDEO_TAG;

drop table if exists VIDEO_THEME;

drop table if exists VIDEO_USER;

drop table if exists VIDEO_ORDER;

drop table if exists RATING;


/*==============================================================*/
/* Table: RATING                                              */
/*==============================================================*/
create table RATING
(
  idVideo int not null,
  idUser  int not null,
  rating  int not null,
  primary key (idVideo, idUser)
);

/*==============================================================*/
/* Table: COMMENT                                               */
/*==============================================================*/
create table COMMENT
(
  idComment      int not null AUTO_INCREMENT,
  idVideo        int not null,
  idUser         int not null,
  contentComment text,
  primary key (idComment)
);

/*==============================================================*/
/* Table: SUBSCRIPTION                                          */
/*==============================================================*/
create table SUBSCRIPTION
(
  idSubscription       int not null AUTO_INCREMENT,
  priceSubscription    float,
  durationSubscription int,
  typeSubscription     int,
  titleSubscription    varchar(100),
  nbDaysTrial          int,
  primary key (idSubscription)
);

/*==============================================================*/
/* Table: TAG                                                   */
/*==============================================================*/
create table TAG
(
  idTag    int not null AUTO_INCREMENT,
  titleTag varchar(200),
  primary key (idTag)
);

/*==============================================================*/
/* Table: THEME                                                 */
/*==============================================================*/
create table THEME
(
  idTheme    int not null AUTO_INCREMENT,
  titleTheme varchar(200),
  primary key (idTheme)
);

/*==============================================================*/
/* Table: USER                                                  */
/*==============================================================*/
create table USER
(
  idUser    int not null AUTO_INCREMENT,
  lastname  varchar(50),
  firstname varchar(50),
  password  varchar(200),
  email     varchar(50),
  avatar    varchar(200),
  primary key (idUser)
);

/*==============================================================*/
/* Table: USERSUBSCRIPTION                                      */
/*==============================================================*/
create table USERSUBSCRIPTION
(
  idUserSubscription int not null AUTO_INCREMENT,
  idUser             int not null,
  idSubscription     int not null,
  startDate          datetime,
  primary key (idUserSubscription)
);

/*==============================================================*/
/* Table: VIDEO                                                 */
/*==============================================================*/
create table VIDEO
(
  idVideo          int          not null AUTO_INCREMENT,
  titleVideo       varchar(200) not null,
  durationVideo    int,
  priceVideo       float,
  descriptionVideo text,
  urlVideo         varchar(200),
  idYoutube        varchar(50),
  authorVideo      varchar(200),
  primary key (idVideo)
);

/*==============================================================*/
/* Table: VIDEO_TAG                                             */
/*==============================================================*/
create table VIDEO_TAG
(
  idTag   int not null,
  idVideo int not null,
  primary key (idTag, idVideo)
);

/*==============================================================*/
/* Table: VIDEO_THEME                                           */
/*==============================================================*/
create table VIDEO_THEME
(
  idVideo int not null,
  idTheme int not null,
  primary key (idVideo, idTheme)
);

/*==============================================================*/
/* Table: VIDEO_ORDER                                          */
/*==============================================================*/
create table VIDEO_ORDER
(
  pid       varchar(200),
  idUser    int not null,
  payerID   varchar(200),
  paymentID varchar(200),
  token     varchar(200),
  created   datetime,
  amount    float,
  primary key (pid)
);

/*==============================================================*/
/* Table: VIDEO_USER                                          */
/*==============================================================*/
create table VIDEO_USER
(
  idVideo      int not null,
  idUser       int not null,
  datePurchase datetime,
  pid          varchar(200),
  primary key (idVideo, idUser)
);

alter table COMMENT
  add constraint FK_COMMENT_USER foreign key (idUser)
    references USER (idUser) on delete restrict on update restrict;

alter table COMMENT
  add constraint FK_VIDEO_COMMENT foreign key (idVideo)
    references VIDEO (idVideo) on delete restrict on update restrict;

alter table USERSUBSCRIPTION
  add constraint FK_USERSUBSCRIPTION_SUBSCRIPTION foreign key (idSubscription)
    references SUBSCRIPTION (idSubscription) on delete restrict on update restrict;

alter table USERSUBSCRIPTION
  add constraint FK_USER_USERSUBSCRIPTION foreign key (idUser)
    references USER (idUser) on delete restrict on update restrict;

alter table VIDEO_ORDER
  add constraint FK_VIDEO_ORDER_USER foreign key (idUser)
    references USER (idUser) on delete restrict on update restrict;

alter table VIDEO_USER
  add constraint FK_VIDEO_USER foreign key (idUser)
    references USER (idUser) on delete restrict on update restrict;

alter table VIDEO_USER
  add constraint FK_VIDEO_USER2 foreign key (idVideo)
    references VIDEO (idVideo) on delete restrict on update restrict;

alter table VIDEO_USER
  add constraint FK_VIDEO_USER3 foreign key (pid)
    references VIDEO_ORDER (pid) on delete restrict on update restrict;

alter table RATING
  add constraint FK_RATING foreign key (idVideo)
    references VIDEO (idVideo) on delete restrict on update restrict;

alter table RATING
  add constraint FK_RATING2 foreign key (idUser)
    references USER (idUser) on delete restrict on update restrict;

alter table VIDEO_TAG
  add constraint FK_VIDEO_TAG foreign key (idTag)
    references TAG (idTag) on delete restrict on update restrict;

alter table VIDEO_TAG
  add constraint FK_VIDEO_TAG2 foreign key (idVideo)
    references VIDEO (idVideo) on delete restrict on update restrict;

alter table VIDEO_THEME
  add constraint FK_VIDEO_THEME foreign key (idVideo)
    references VIDEO (idVideo) on delete restrict on update restrict;

alter table VIDEO_THEME
  add constraint FK_VIDEO_THEME2 foreign key (idTheme)
    references THEME (idTheme) on delete restrict on update restrict;

