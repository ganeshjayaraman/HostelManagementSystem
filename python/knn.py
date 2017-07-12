from operator import itemgetter
import numpy as np
import os
import pandas as pd
#import matplolib.pyplot as plt
import csv

os.chdir("C:\wamp\www\hostel\python")
cities={'Chennai':1,'Madurai':2,'Trichy':3,'Coimbatore':4}
dept={'cse':1,'ece':2,'mech':3,'eee':4}
with open('C:\wamp\www\hostel\python\stduent_list.csv','r') as f:
    rowdata=[]
    reader=csv.reader(f)
    reader.next()
    for row in reader:
        rowdata.append(row)
#rowdata=rowdata[1:]
#print rowdata
for i in xrange(len(rowdata)):
    rowdata[i]=rowdata[i][:-1]
for i in rowdata:
    i[0]=int(i[0])
    i[1]=dept[i[1]]
    i[2]=cities[i[2]]
data=[]
data=rowdata
#print rowdata
def EuclidDist(ins1,ins2,length):
    dist=0
    for i in xrange(length):
        dist+=((ins1[i]-ins2[i])**2)
    return dist
k=3
#define k
#get-data
#print data
alloted=[]
while len(data)!=0:
    distance=[]
    for j in xrange(len(data)):
        dist=EuclidDist(data[0][1:],data[j][1:],2)
        distance.append((data[j],dist,j,data[j][0]))
    distance.sort(key=itemgetter(1))
    neighbours=[]
    temp=[]
    if len(data)>k:
        #temp=[data[0]]
        for h in xrange(k):
            neighbours.append(distance[h][2])
            temp.append(data[distance[h][2]])
        #print "asda",
        alloted.append([data[0][0],data[neighbours[1]][0],data[neighbours[2]][0]])
        #del(data[neighbours[0]])
        #del(neighbours[0])
        #print neighbours
        data.remove(temp[0])
        data.remove(temp[1])
        data.remove(temp[2])
        """for n in xrange(1,3):
            print "del",
            print n+1
            print data[neighbours[0]-n]
            del(data[neighbours[0]-n])
            print data,
            print "  "
            del(neighbours[0])"""#allot rooms to k people and delete elements of neighbours and the element from data
    elif len(data)<=k:
         
         l=[]
         for i in data:   
             l.append(i[0])
         j=[]
         if len(data)<k:
             j=[0*(k-len(data))]
         l=l+j
         alloted.append(l)
         for n in xrange(len(data)):
             #data.remove(n)
             del(data[0])
         #allot all people to the element and exit
final=pd.DataFrame(alloted)
final=final.replace(np.nan,0)
final.columns=['Student_1','Student_2','Student_3']
final.to_csv("MainHostelAllot.csv")





