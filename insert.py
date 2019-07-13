import sqlite3 as sql

conn = sql.connect('database.db')
a="meghana"
b="1234"
with sql.connect("database.db") as con:
            cur = con.cursor()
            cur.execute("INSERT INTO student (user_name,password) VALUES (?,?)",(a,b) )
            
            con.commit()