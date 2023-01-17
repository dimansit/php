<?php


$db = include "db.php";

$db->exec('CREATE TABLE users (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  name VARCHAR(150),
  date_reg DATETIME DEFAULT current_timestamp,
  end_visit DATETIME DEFAULT current_timestamp,
  username VARCHAR(100) NOT NULL,
  password VARCHAR(100) NOT NULL
)');

$db->exec('CREATE TABLE tasks (
    task_id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER NOT NULL,
    date_create DATETIME DEFAULT current_timestamp,
    date_update DATETIME DEFAULT current_timestamp,
    date_done DATETIME NULL,
    isDone INTEGER  NOT NULL DEFAULT 0, 
    priority INTEGER NOT NULL DEFAULT 0,
    description VARCHAR(300) NOT NULL
  )');

$db->exec('CREATE INDEX user ON tasks (user_id)');
