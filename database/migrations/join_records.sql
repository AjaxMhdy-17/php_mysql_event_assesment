CREATE TABLE join_record(
 id INT AUTO_INCREMENT PRIMARY KEY,
 user_id INT ,
 event_id INT , 
 approve BOOlEAN DEFAULT TRUE ,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
 FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE,
 INDEX idx_user_id (user_id), 
 INDEX idx_event_id (event_id)
);