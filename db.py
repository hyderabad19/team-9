import sqlite3

conn = sqlite3.connect('database.db')
print("Opened database successfully")

conn.execute('CREATE TABLE student (stu_id INTEGER PRIMARY KEY AUTOINCREMENT,stu_name TEXT, addr TEXT, phno TEXT, dob TEXT,skills TEXT,user_name TEXT,password TEXT)')
conn.execute('CREATE TABLE staff (sta_id INTEGER PRIMARY KEY AUTOINCREMENT,sta_name TEXT, addr TEXT, phno TEXT, dob TEXT,skills TEXT,user_name TEXT,password TEXT)')
conn.execute('CREATE TABLE course(course_id INTEGER PRIMARY KEY AUTOINCREMENT,course_name TEXT,course_des TEXT)')
conn.execute('CREATE TABLE sta_cou_bridge (sta_id INTEGER, course_id INTEGER)')
conn.execute('CREATE TABLE stu_sta_cou_bridge (stu_id INTEGER, sta_id INTEGER, course_id INTEGER)')
conn.execute('CREATE TABLE forum(qid  INTEGER PRIMARY KEY AUTOINCREMENT,stu_id INTEGER,status INTEGER)')
conn.execute('CREATE TABLE answer(ans_id INTEGER PRIMARY KEY AUTOINCREMENT,qid INTEGER,ans TEXT)')
conn.execute('CREATE TABLE content(sta_id INTEGER,course_id INTEGER,uploads TEXT)')
print("Table created successfully")
conn.close()