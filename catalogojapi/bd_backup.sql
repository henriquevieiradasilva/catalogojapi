-- CRIAÇÃO E UTILIZAÇÃO DO BANCO
CREATE DATABASE catalogojapi_db;
USE catalogojapi_db;

-- TABELA USUÁRIOS
CREATE TABLE Users (
    UserID VARCHAR(30) NOT NULL UNIQUE, 
    Name VARCHAR(120) NOT NULL,
    ProfilePhoto VARCHAR(100) DEFAULT 'default.png' NOT NULL,
    Email VARCHAR(255) NOT NULL UNIQUE,
    Password VARCHAR(255) NOT NULL, 
    PRIMARY KEY (UserID)
);

-- TABELA ESPECIALIZAÇÃO DOS USUÁRIOS COMO ESPECIALISTAS
CREATE TABLE ExpertSpecialization (
    UserID VARCHAR(30) NOT NULL UNIQUE,
    LattesCV TEXT NOT NULL UNIQUE, 
    PRIMARY KEY (UserID),
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
        ON DELETE CASCADE -- Se excluir o usuario, apaga ele dessa tabela também
        ON UPDATE CASCADE -- Se atualizar o ID de usuario, atualiza ele aqui também
);

-- TABELA DAS POSTAGENS
CREATE TABLE Posts (
    PostID INT NOT NULL UNIQUE AUTO_INCREMENT, 
    UserID VARCHAR(30), 
    Classification ENUM('Mammals', 'Birds', 'Reptiles', 'Amphibians', 'Fish', 'Invertebrates', 'Angiosperms', 'Gymnosperms', 'Ferns', 'Lycophytes', 'Bryophytes', 'Algae', 'Undetermined') NOT NULL, -- Mamífero, Aves, Répteis, Anfíbios, Peixes, Invertebrados, Angiospermas, Gimnospermas, Samambaias, Licófitas, Briófitas, Algas ou Indeterminado
    Species VARCHAR(100) NOT NULL,
    VerificationStatus ENUM('ExpertVerified', 'ExpertDiscussion', 'CommunityVerified', 'CommunityDiscussion', 'Unidentified') NOT NULL, -- Verificado por Especialistas, Em Discussão entre Especialistas, Verificado pela Comunidade, Em Discussão entre Comunidade ou Não Identificado
    Sex ENUM('Male', 'Female', 'Undetermined') NOT NULL, -- Macho, Fêmea, ou Indeterminado
    Age ENUM('Adult', 'Young', 'Cub', 'Undetermined') NOT NULL, -- Adulto, Jovem, Filhote ou Indeterminado
    SensitiveContent BOOLEAN DEFAULT FALSE, -- TRUE ou FALSE, mas por padrão vem como FALSE
    Notes TEXT, 
    RecordDate DATE NOT NULL,
    RecordTime TIME NOT NULL,
    Location TEXT NOT NULL,
    PublishDate DATE NOT NULL,
    PublishTime TIME NOT NULL,
    PRIMARY KEY (PostID),
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
        ON DELETE SET NULL-- Se excluir o usuario, altera para NULO o ID do usuario
        ON UPDATE CASCADE -- Se atualizar o ID de usuario, atualiza ele aqui também
);

-- TABELA DAS FOTOS DAS POSTAGENS
CREATE TABLE Photos (
    PostID INT NOT NULL,
    ImageName VARCHAR(100) NOT NULL UNIQUE,
    PRIMARY KEY (PostID, ImageName),
    FOREIGN KEY (PostID) REFERENCES Posts(PostID)
        ON DELETE CASCADE -- Se excluir o post, apaga todas as fotos
);

-- TABELA DOS VÍDEOS DAS POSTAGENS
CREATE TABLE Videos (
    PostID INT NOT NULL,
    VideoName VARCHAR(100) NOT NULL UNIQUE, -- Nome dos vídeos sempre serão diferentes, por meio de um algoritmo feito em PHP
    PRIMARY KEY (PostID, VideoName),
    FOREIGN KEY (PostID) REFERENCES Posts(PostID)
        ON DELETE CASCADE  -- Se excluir o post, apaga todos os vídeos
);

-- TABELA DOS COMENTÁRIOS
CREATE TABLE Comments (
    CommentID INT NOT NULL UNIQUE AUTO_INCREMENT,
    UserID VARCHAR(30), 
    PostID INT NOT NULL,
    Species VARCHAR(100),
    Classification ENUM('Mammals', 'Birds', 'Reptiles', 'Amphibians', 'Fish', 'Invertebrates', 'Angiosperms', 'Gymnosperms', 'Ferns', 'Lycophytes', 'Bryophytes', 'Algae', 'Undetermined'),   -- Mamífero, Aves, Répteis, Anfíbios, Peixes, Invertebrados, Angiospermas, Gimnospermas, Samambaias, Licófitas, Briófitas, Algas, Indeterminado ou NULO
    Sex ENUM('Male', 'Female', 'Undetermined'), -- Macho, Fêmea, Indeterminado ou NULO
    Age ENUM('Adult', 'Young', 'Cub', 'Undetermined'), -- Adulto, Jovem, Filhote, Indeterminado ou NULO
    Notes TEXT,
    CommentDate DATE NOT NULL,
    CommentTime TIME NOT NULL,
    ParentCommentID INT DEFAULT NULL,
    PRIMARY KEY (CommentID),
    FOREIGN KEY (PostID) REFERENCES Posts(PostID)
        ON DELETE CASCADE,
    FOREIGN KEY (ParentCommentID) REFERENCES Comments(CommentID)
        ON DELETE CASCADE,
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
        ON DELETE SET NULL -- Se excluir o usuario, apaga ele dessa tabela também
        ON UPDATE CASCADE -- Se atualizar o ID de usuario, atualiza ele aqui também
); 
  




-- !! CRIAÇÃO DOS DADOS FICTÍCIOS !!

-- USUÁRIO PADRÃO:
INSERT INTO Users (UserID, Name, ProfilePhoto, Email, Password)
VALUES ('usuario', 'Usuario Exemplo Junior','1.png','usuario@exemplo.com', '$2y$10$Lsjc3KN.XD8VZHj8Y/qHReh82VXWLoKqnnTkI8pBJuNJM01bPEMbG');


INSERT INTO Users (UserID, Name, Email, Password)
VALUES ('usuario2', 'Usuario Exemplo Junior 2', 'usuario2@exemplo.com', '$2y$10$QrW68DeoaLKGeKBNgfalL.Cw1PLgU4T5KeBIx7rEmCifPh95DY7Ve');





-- USUÁRIO ESPECIALISTA:
INSERT INTO Users (UserID, Name, ProfilePhoto, Email, Password)
VALUES ('especialista', 'Especialista Exemplo Neto', '2.png', 'especialista@exemplo.com', '$2y$10$cIz9hs1xuSiOvZsTBiA4vOAxYSvs8Nw4u6kIheNDpDXvG2agNq0PC');
INSERT INTO ExpertSpecialization (UserID, LattesCV)
VALUES ('especialista', 'http://lattes.cnpq.br/3812608000050957');


INSERT INTO Users (UserID, Name, Email, Password)
VALUES ('especialista2', 'Especialista Exemplo Neto 2', 'especialista2@exemplo.com', '$2y$10$FjaAHXhjBwJkuQQIqArCBeT0ASSeRpAeWhwmWx9o2WCoZywk1nGiC');
INSERT INTO ExpertSpecialization (UserID, LattesCV)
VALUES ('especialista2', 'http://lattes.cnpq.br/5813544566163539');