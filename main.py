from flask import Flask, flash, redirect, render_template, request, url_for
from werkzeug import secure_filename
import os
import sqlite3 as sql
app = Flask(__name__)
conn = sql.connect('database.db')
@app.route('/loginpage')
def loginpage():
    return render_template('login.html')
@app.route('/index')
def index():
    return render_template('index.html')

@app.route('/login',methods=['GET', 'POST'])
def loginverify():
    if request.method == 'POST':
      a=request.form['userid']
      b=request.form['password']
      with sql.connect("database.db") as con:
          cur = con.cursor()
          cur.execute("select password from student where user_name= ?",(a,))
          rows = cur.fetchall()
          print(rows)
          for r in rows:
              if b==r[0]:
                 return redirect(url_for('index'))
              else:
                 return redirect(url_for('loginpage'))
    return redirect(url_for('loginpage'))
if __name__ == "__main__":
   
   app.run(debug = True)     
			
   
