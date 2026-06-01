USE NombreBaseDatosProporcionadaPorHosting;

CREATE TABLE libros(
    NumLibro INT AUTO_INCREMENT PRIMARY KEY,
    NombreLibro VARCHAR(150) NOT NULL,
    Editorial VARCHAR(100) NOT NULL,
    Existencias INT NOT NULL
);