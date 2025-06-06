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





-- NOVOS POSTS
INSERT INTO Posts (
    UserID,
    Classification,
    Species,
    VerificationStatus,
    Sex,
    Age,
    SensitiveContent,
    Notes,
    RecordDate,
    RecordTime,
    Location,
    PublishDate,
    PublishTime
) VALUES (
    'especialista',
    'Fish',
    'Hoplias malabaricus',
    'ExpertVerified',
    'Undetermined',
    'Young',
    FALSE,
    'Peixe avistado em igarapé de águas negras. Provavelmente juvenil.',
    '2025-05-10',
    '11:25:00',
    'Rio Negro - AM, Brasil;-3.137;-60.024',
    '2025-05-11',
    '15:05:00'
);
INSERT INTO Photos (PostID, ImageName) VALUES
('1', '01062025_163253_1.png');


INSERT INTO Posts (
    UserID,
    Classification,
    Species,
    VerificationStatus,
    Sex,
    Age,
    SensitiveContent,
    Notes,
    RecordDate,
    RecordTime,
    Location,
    PublishDate,
    PublishTime
) VALUES (
    'especialista',
    'Amphibians',
    'Phyllomedusa bicolor',
    'ExpertDiscussion',
    'Male',
    'Adult',
    TRUE,
    'Indivíduo machucado vocalizando durante a noite. Registro sonoro disponível em vídeo.',
    '2025-05-14',
    '20:10:00',
    'Floresta Nacional do Tapajós - PA, Brasil;-2.857222;-54.964722',
    '2025-05-16',
    '10:32:00'
);
INSERT INTO Photos (PostID, ImageName) VALUES
('2', '01062025_163152_2.png');


INSERT INTO Posts (
    UserID,
    Classification,
    Species,
    VerificationStatus,
    Sex,
    Age,
    SensitiveContent,
    Notes,
    RecordDate,
    RecordTime,
    Location,
    PublishDate,
    PublishTime
) VALUES (
    'usuario',                              
    'Mammals',                                
    'leopardus pardalis',                     
    'CommunityVerified',                         
    'Female',                                  
    'Adult',                                   
    FALSE,                                     
    'Observada à margem do rio ao entardecer. Comportamento calmo.', 
    '2025-05-15',                             
    '17:43:00',                               
    'Parque Nacional do Xingu - MT, Brasil;-23,2315216;-46,9355714',   
    '2025-05-16',                             
    '09:15:00'                                
);
INSERT INTO Videos (PostID, VideoName) VALUES
('3', '01062025_093212_3.mp4');


INSERT INTO Posts (
    UserID,
    Classification,
    Species,
    VerificationStatus,
    Sex,
    Age,
    SensitiveContent,
    Notes,
    RecordDate,
    RecordTime,
    Location,
    PublishDate,
    PublishTime
) VALUES (
    'usuario',
    'Invertebrates',
    'Epiperipatus sp.',
    'CommunityDiscussion',
    'Undetermined',
    'Undetermined',
    FALSE,
    'Encontrado sob tronco em área úmida. Possivelmente onicóforo, mas ainda sem confirmação.',
    '2025-05-13',
    '13:55:00',
    'Parque Estadual do Turvo - RS, Brasil;-27.174310;-54.409741',
    '2025-05-14',
    '16:40:00'
);
INSERT INTO Videos (PostID, VideoName) VALUES
('4', '01062025_123759_4.mp4');


INSERT INTO Posts (
    UserID,
    Classification,
    Species,
    VerificationStatus,
    Sex,
    Age,
    SensitiveContent,
    Notes,
    RecordDate,
    RecordTime,
    Location,
    PublishDate,
    PublishTime
) VALUES (
    'usuario',
    'Undetermined',
    'Indeterminado',
    'Unidentified',
    'Undetermined',
    'Undetermined',
    TRUE,
    'Animal pequeno flagrado à noite atropelado. Imagem não permite identificação.',
    '2025-05-12',
    '03:15:00',
    'Estação Ecológica do Taim - RS, Brasil;-32.489722;-52.545833',
    '2025-05-13',
    '12:50:00'
);
INSERT INTO Photos (PostID, ImageName) VALUES
('5', '01062025_264323_5.png');
INSERT INTO Videos (PostID, VideoName) VALUES
('5', '01062025_123456_5.mp4');





-- NOVOS COMENTÁRIOS
INSERT INTO Comments (
    UserID,
    PostID,
    Species,
    Classification,
    Sex,
    Age,
    Notes,
    CommentDate,
    CommentTime,
    ParentCommentID
) VALUES (
    'especialista2',
    2,
    'Nyctibius griseus',
    'Birds',
    'Female',
    'Young',
    'O animal no vídeo não é um anfíbio, mas sim uma jovem fêmea de urutaú (Nyctibius griseus). A vocalização e aparência noturna confundiram a identificação.',
    '2025-05-17',
    '10:45:00',
    NULL
);


INSERT INTO Comments (
    UserID,
    PostID,
    Species,
    Classification,
    Sex,
    Age,
    Notes,
    CommentDate,
    CommentTime,
    ParentCommentID
) VALUES (
    'usuario2',
    4,
    'Caiman latirostris',
    'Reptiles',
    'Male',
    'Cub',
    'Achei que fosse um filhote de jacaré-de-papo-amarelo. O corpo brilhante e comprido me confundiu na hora.',
    '2025-05-17',
    '11:10:00',
    NULL
);


INSERT INTO Comments (
    UserID,
    PostID,
    Species,
    Classification,
    Sex,
    Age,
    Notes,
    CommentDate,
    CommentTime,
    ParentCommentID
) VALUES (
    'especialista',
    5,
    'Indeterminado',
    'Undetermined',
    'Undetermined',
    'Undetermined',
    'Pela foto não dá para entender nada do que é, precisa de fotos melhores',
    '2025-05-17',
    '11:10:00',
    NULL
);


INSERT INTO Comments (
    UserID,
    PostID,
    Species,
    Classification,
    Sex,
    Age,
    Notes,
    CommentDate,
    CommentTime,
    ParentCommentID
) VALUES (
    'usuario2',
    5,
    NULL,
    NULL,
    NULL,
    NULL,
    'Verdade, não tem como ver nada',
    '2025-05-17',
    '11:13:30',
    3
);


INSERT INTO Comments (
    UserID,
    PostID,
    Species,
    Classification,
    Sex,
    Age,
    Notes,
    CommentDate,
    CommentTime,
    ParentCommentID
) VALUES (
    'usuario',
    5,
    NULL,
    NULL,
    NULL,
    NULL,
    'Vou tentar voltar lá e tirar fotos melhores',
    '2025-05-17',
    '11:17:00',
    3
);



