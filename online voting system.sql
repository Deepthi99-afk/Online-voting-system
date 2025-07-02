-- Create database
CREATE DATABASE IF NOT EXISTS voting_system;
USE voting_system;

-- Candidates table
CREATE TABLE candidates (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL
);

-- Insert sample candidates
INSERT INTO candidates (name) VALUES ('Alice'), ('Bob');

-- Votes table
CREATE TABLE votes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  voter_id VARCHAR(100) NOT NULL,
  candidate_id INT NOT NULL,
  FOREIGN KEY (candidate_id) REFERENCES candidates(id)
);