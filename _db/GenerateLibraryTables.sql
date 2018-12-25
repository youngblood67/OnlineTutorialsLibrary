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
   IDBASKET             int not null,
   IDUSER               int not null,
   DATEPURCHASE         datetime,
   primary key (IDBASKET)
);

/*==============================================================*/
/* Table: COMMENT                                               */
/*==============================================================*/
create table COMMENT
(
   IDCOMMENT            int not null,
   IDVIDEO              int not null,
   IDUSER               int not null,
   CONTENT              text,
   RATING               int,
   primary key (IDCOMMENT)
);

/*==============================================================*/
/* Table: ONLINEVISUALIZATION                                   */
/*==============================================================*/
create table ONLINEVISUALIZATION
(
   IDUSER               int not null,
   IDVIDEO              int not null,
   DATEVISU             datetime,
   primary key (IDUSER, IDVIDEO)
);

/*==============================================================*/
/* Table: SUBSCRIPTION                                          */
/*==============================================================*/
create table SUBSCRIPTION
(
   IDSUBSCRIPTION       int not null,
   PRICE                float,
   DURATION             int,
   TYPE                 int,
   NBDAYSTRIAL          int,
   primary key (IDSUBSCRIPTION)
);

/*==============================================================*/
/* Table: TAG                                                   */
/*==============================================================*/
create table TAG
(
   IDTAG                int not null,
   TITLE                varchar(200),
   primary key (IDTAG)
);

/*==============================================================*/
/* Table: THEME                                                 */
/*==============================================================*/
create table THEME
(
   IDTHEME              int not null,
   TITLE                varchar(200),
   DESCRIPTION          text,
   primary key (IDTHEME)
);

/*==============================================================*/
/* Table: USER                                                  */
/*==============================================================*/
create table USER
(
   IDUSER               int not null,
   IDUSERSUBSCRIPTION   int,
   LASTNAME             varchar(50),
   FIRSTNAME            varchar(50),
   PASSWORD             varchar(50),
   EMAIL                varchar(50),
   PSEUDO               varchar(50),
   primary key (IDUSER)
);

/*==============================================================*/
/* Table: USERSUBSCRIPTION                                      */
/*==============================================================*/
create table USERSUBSCRIPTION
(
   IDUSERSUBSCRIPTION   int not null,
   IDSUBSCRIPTION       int not null,
   IDUSER               int not null,
   STARTDATE            datetime,
   primary key (IDUSERSUBSCRIPTION)
);

/*==============================================================*/
/* Table: VIDEO                                                 */
/*==============================================================*/
create table VIDEO
(
   IDVIDEO              int not null,
   TITLE                varchar(200),
   DURATION             int,
   PRICE                float,
   DESCRIPTION          text,
   primary key (IDVIDEO)
);

/*==============================================================*/
/* Table: VIDEO_BASKET                                          */
/*==============================================================*/
create table VIDEO_BASKET
(
   IDBASKET             int not null,
   IDVIDEO              int not null,
   primary key (IDBASKET, IDVIDEO)
);

/*==============================================================*/
/* Table: VIDEO_TAG                                             */
/*==============================================================*/
create table VIDEO_TAG
(
   IDTAG                int not null,
   IDVIDEO              int not null,
   primary key (IDTAG, IDVIDEO)
);

/*==============================================================*/
/* Table: VIDEO_THEME                                           */
/*==============================================================*/
create table VIDEO_THEME
(
   IDVIDEO              int not null,
   IDTHEME              int not null,
   primary key (IDVIDEO, IDTHEME)
);

alter table BASKET add constraint FK_USER_BASKET foreign key (IDUSER)
      references USER (IDUSER) on delete restrict on update restrict;

alter table COMMENT add constraint FK_COMMENT_USER foreign key (IDUSER)
      references USER (IDUSER) on delete restrict on update restrict;

alter table COMMENT add constraint FK_VIDEO_COMMENT foreign key (IDVIDEO)
      references VIDEO (IDVIDEO) on delete restrict on update restrict;

alter table ONLINEVISUALIZATION add constraint FK_ONLINEVISUALIZATION foreign key (IDUSER)
      references USER (IDUSER) on delete restrict on update restrict;

alter table ONLINEVISUALIZATION add constraint FK_ONLINEVISUALIZATION2 foreign key (IDVIDEO)
      references VIDEO (IDVIDEO) on delete restrict on update restrict;

alter table USER add constraint FK_USER_USERSUBSCRIPTION2 foreign key (IDUSERSUBSCRIPTION)
      references USERSUBSCRIPTION (IDUSERSUBSCRIPTION) on delete restrict on update restrict;

alter table USERSUBSCRIPTION add constraint FK_USERSUBSCRIPTION_SUBSCRIPTION foreign key (IDSUBSCRIPTION)
      references SUBSCRIPTION (IDSUBSCRIPTION) on delete restrict on update restrict;

alter table USERSUBSCRIPTION add constraint FK_USER_USERSUBSCRIPTION foreign key (IDUSER)
      references USER (IDUSER) on delete restrict on update restrict;

alter table VIDEO_BASKET add constraint FK_VIDEO_BASKET foreign key (IDBASKET)
      references BASKET (IDBASKET) on delete restrict on update restrict;

alter table VIDEO_BASKET add constraint FK_VIDEO_BASKET2 foreign key (IDVIDEO)
      references VIDEO (IDVIDEO) on delete restrict on update restrict;

alter table VIDEO_TAG add constraint FK_VIDEO_TAG foreign key (IDTAG)
      references TAG (IDTAG) on delete restrict on update restrict;

alter table VIDEO_TAG add constraint FK_VIDEO_TAG2 foreign key (IDVIDEO)
      references VIDEO (IDVIDEO) on delete restrict on update restrict;

alter table VIDEO_THEME add constraint FK_VIDEO_THEME foreign key (IDVIDEO)
      references VIDEO (IDVIDEO) on delete restrict on update restrict;

alter table VIDEO_THEME add constraint FK_VIDEO_THEME2 foreign key (IDTHEME)
      references THEME (IDTHEME) on delete restrict on update restrict;

