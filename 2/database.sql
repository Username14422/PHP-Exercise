CREATE DATABASE [Books]
GO

USE [Books]
GO

CREATE TABLE [Author](
	[id_author] [int] NOT NULL,
	[name] [varchar](50) NOT NULL,
	[surname] [varchar](50) NOT NULL,
	[patronymic] [varchar](50) NULL,
	[birthday] [date] NOT NULL,
 CONSTRAINT [PK_Author] PRIMARY KEY CLUSTERED 
(
	[id_author] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

CREATE TABLE [Book](
	[id_book] [int] NOT NULL,
	[title] [varchar](100) NOT NULL,
	[year] [int] NOT NULL,
 CONSTRAINT [PK_Book] PRIMARY KEY CLUSTERED 
(
	[id_book] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO


CREATE TABLE [Author_of_the_book](
	[id_author] [int] NOT NULL,
	[id_book] [int] NOT NULL,
 CONSTRAINT [PK_Author_of_the_book] PRIMARY KEY CLUSTERED 
(
	[id_author] ASC,
	[id_book] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

ALTER TABLE [dbo].[Author_of_the_book]  WITH CHECK ADD  CONSTRAINT [FK_Author_of_the_book_Author] FOREIGN KEY([id_author])
REFERENCES [dbo].[Author] ([id_author])
GO

ALTER TABLE [dbo].[Author_of_the_book] CHECK CONSTRAINT [FK_Author_of_the_book_Author]
GO

ALTER TABLE [dbo].[Author_of_the_book]  WITH CHECK ADD  CONSTRAINT [FK_Author_of_the_book_Book] FOREIGN KEY([id_book])
REFERENCES [dbo].[Book] ([id_book])
GO

ALTER TABLE [dbo].[Author_of_the_book] CHECK CONSTRAINT [FK_Author_of_the_book_Book]
GO
