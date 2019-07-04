# -*- coding: utf-8 -*-
"""
Created on Wed Jul  3 11:22:13 2019

@author: Ajay
"""
import requests
from bs4 import BeautifulSoup
import pandas as pd

result = requests.get("http://www.imdb.com/chart/top")

bs = BeautifulSoup(result.text)
llist = bs.find('tbody', {'class':'lister-list'})
row= llist.findAll('tr')
list1=[]
list2=[]
list3=[]
for tr in row:
     title=tr.find('td',{'class':'titleColumn'}).text
     rating=tr.find('td',{'class':'ratingColumn imdbRating'}).text
     print(title)
     list1.append(title)
     print(rating)
     list2.append(rating)
anchor=llist.findAll('a')
for a in anchor:
    cast=a.get('title')
    list3.append(cast)
res = [] 
for val in list3: 
    if val != None : 
        res.append(val)

df=pd.DataFrame(list1,columns=['title'])
df['rating']=list2
df['cast']=res
df.to_csv('movies.csv')
print(df)




    
   

