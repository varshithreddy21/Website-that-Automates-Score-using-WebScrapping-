import requests
import bs4
import mysql.connector
mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="students"
)
mycursor = mydb.cursor()

mycursor.execute("SELECT * FROM users")

myresult = mycursor.fetchall()

for x in myresult:
  res=requests.get('https://www.codechef.com/users/'+x[11])
  soup=bs4.BeautifulSoup(res.text,'lxml')
  score1=soup.select('.rating-number')[0].getText()
  sql = "UPDATE users SET ccs="+score1+" WHERE id="+str(x[0])+"";
  mycursor.execute(sql)
  mydb.commit()
  res=requests.get('https://codeforces.com/profile/'+x[10])
  soup=bs4.BeautifulSoup(res.text,'lxml')
 # print(soup.select('div.info>ul span')[0].getText())
  score2 = soup.select('div.info>ul span')[0].getText()
  sql = "UPDATE users SET cfs=" + score2 + " WHERE id=" + str(x[0]) + "";
  mycursor.execute(sql)
  mydb.commit()
  #https://www.hackerearth.com/@varshithreddy8

  res=requests.get('https://www.interviewbit.com/profile/'+x[9])
  soup=bs4.BeautifulSoup(res.text,'lxml')
  #print(soup.select('.txt')[1].getText())
  score3 = soup.select('.txt')[1].getText()
  sql = "UPDATE users SET ibs=" + score3 + " WHERE id=" + str(x[0]) + "";
  mycursor.execute(sql)
  mydb.commit()
  tt=int(score1)+int(score2)+int(score3)
  sql = "UPDATE users SET tos=" + str(tt )+ " WHERE id=" + str(x[0]) + "";
  mycursor.execute(sql)
  mydb.commit()