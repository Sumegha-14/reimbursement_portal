from flask import Flask, request, jsonify
from sklearn.externals import joblib
import traceback
import pandas as pd
import numpy as np

# Your API definition
app = Flask(__name__)
@app.route('/')
def index():
    return 'Hello'
#model = joblib.load(open('model.pkl','rb'))

@app.route('/predict', methods=['POST'])
def predict():
    arr=request.json
    symptoms=arr['symptoms']

    symptoms = np.array(symptoms).reshape(1,len(symptoms))
    lr = joblib.load("./model.pkl")
    result = lr.predict(symptoms)
    print(result)
    #result1=predicted(symptoms)
    return result[0]
    
if __name__ == '__main__':
    try:
        port = int(sys.argv[1]) # This is for a command-line input
    except:
        port = 12345 # If you don't provide any port the port will be set to 12345

    lr = joblib.load("model.pkl") # Load "model.pkl"
    print ('Model loaded')
    model_columns = joblib.load("model_columns.pkl") # Load "model_columns.pkl"
    print ('Model columns loaded')

    app.run(port=port, debug=True)
    app.run()