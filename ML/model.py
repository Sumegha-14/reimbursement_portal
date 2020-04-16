import pandas as pd
import numpy as np
#import seaborn as sns
#import matplotlib.pyplot as plt

data = pd.read_csv("./Training_diseases.csv")
df = pd.DataFrame(data)
cols = df.columns
cols = cols[:-1]
t = df['itching'].value_counts()
l = []
h = []
for i in range (132):
    r = cols[i]
    p = df.groupby(r).size()
    if p[0]<=4500:
        l.append(p)
        h.append(r)
x = df[h]
y = df['prognosis']
from sklearn.tree import DecisionTreeClassifier, export_graphviz
#from sklearn.cross_validation import train_test_split
from sklearn.model_selection import train_test_split
x_train, x_test, y_train, y_test = train_test_split(x, y, test_size=0.33, random_state=42)
dt = DecisionTreeClassifier()
clf_dt=dt.fit(x_train,y_train)
#from sklearn import cross_validation
from  sklearn.model_selection import cross_val_score
#print ("cross result========")
scores = cross_val_score(dt, x_test, y_test, cv=3)
#print (scores)
#print (scores.mean())
test_data = pd.read_csv("./Testing.csv")
testx = test_data[h]
testy = test_data['prognosis']

# Save your model
from sklearn.externals import joblib
joblib.dump(dt, 'model.pkl')
print("Model dumped!")

# Load the model that you just saved
lr = joblib.load('model.pkl')

# Saving the data columns from training
model_columns = list(x.columns)
joblib.dump(model_columns, 'model_columns.pkl')
print("Models columns dumped!")
