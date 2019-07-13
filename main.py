from flask import Flask, flash, redirect, render_template, request, url_for
from werkzeug import secure_filename
import os
import sqlite3 as sql
app = Flask(__name__)
conn = sql.connect('database.db')
@app.route('/loginpage')
def loginpage():
    return render_template('login.html')
@app.route('/index/<stuid>')
def index(stuid):
    return render_template('index.html',userid=stuid)

@app.route('/login',methods=['GET', 'POST'])
def loginverify():
    if request.method == 'POST':
      a=request.form['userid']
      b=request.form['password']
      with sql.connect("database.db") as con:
          cur = con.cursor()
          cur.execute("select password,stu_id from student where user_name= ?",(a,))
          rows = cur.fetchall()
          print(rows)
          for r in rows:
              if b==r[0]:
                 stu=r[1]
                 return redirect(url_for('index',stuid=stu))
              else:
                 return redirect(url_for('loginpage'))
    return redirect(url_for('loginpage'))
if __name__ == "__main__":
   
   app.run(debug = True)     
			
   
