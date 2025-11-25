-- Create database
CREATE DATABASE IF NOT EXISTS mvp_db;
USE mvp_db;

-- Create table pembalap
CREATE TABLE IF NOT EXISTS pembalap (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    tim VARCHAR(255) NOT NULL,
    negara VARCHAR(255) NOT NULL,
    poinMusim INT DEFAULT 0,
    jumlahMenang INT DEFAULT 0
);

-- Insert data
INSERT INTO pembalap (nama, tim, negara, poinMusim, jumlahMenang) VALUES
('Lewis Hamilton', 'Mercedes', 'United Kingdom', 347, 11),
('Max Verstappen', 'Red Bull', 'Netherlands', 335, 10),
('Valtteri Bottas', 'Mercedes', 'Finland', 203, 2),
('Sergio Perez', 'Red Bull', 'Mexico', 190, 1),
('Carlos Sainz', 'Ferrari', 'Spain', 150, 0),
('Daniel Ricciardo', 'McLaren', 'Australia', 115, 1),
('Charles Leclerc', 'Ferrari', 'Monaco', 95, 0),
('Lando Norris', 'McLaren', 'United Kingdom', 88, 0),
('Pierre Gasly', 'AlphaTauri', 'France', 75, 0),
('Fernando Alonso', 'Alpine', 'Spain', 65, 0);

-----------------------------------------------------------
-- TABEL BARU: BALAPAN
-----------------------------------------------------------

CREATE TABLE IF NOT EXISTS balapan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    namaBalapan VARCHAR(255) NOT NULL,
    lokasi VARCHAR(255) NOT NULL,
    tanggal DATE NOT NULL
);

-- Insert 10 dummy data balapan
INSERT INTO balapan (namaBalapan, lokasi, tanggal) VALUES
('Australian Grand Prix', 'Melbourne, Australia', '2024-03-24'),
('Bahrain Grand Prix', 'Sakhir, Bahrain', '2024-03-10'),
('Chinese Grand Prix', 'Shanghai, China', '2024-04-21'),
('Monaco Grand Prix', 'Monte Carlo, Monaco', '2024-05-26'),
('Canadian Grand Prix', 'Montreal, Canada', '2024-06-09'),
('Austrian Grand Prix', 'Spielberg, Austria', '2024-06-30'),
('British Grand Prix', 'Silverstone, UK', '2024-07-07'),
('Hungarian Grand Prix', 'Budapest, Hungary', '2024-07-21'),
('Belgian Grand Prix', 'Spa-Francorchamps, Belgium', '2024-08-25'),
('Italian Grand Prix', 'Monza, Italy', '2024-09-08');