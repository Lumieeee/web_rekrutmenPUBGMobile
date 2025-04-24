from flask import Flask, request, jsonify
import joblib
import numpy as np

app = Flask(__name__)

# Load model dan scaler
scaler = joblib.load('svm_model/scaler.joblib')
model = joblib.load('svm_model/model_svm_bestcv.joblib')

@app.route('/predict', methods=['POST'])
def predict():
    try:
        data = request.get_json()
        features = [data['kd'], data['win_ratio'], data['accuracy'], data['headshot_rate']]
        scaled = scaler.transform([features])

        pred = model.predict(scaled)
        hasil = "Layak" if pred[0] == 0 else "Tidak Layak"

        confidence = None
        if hasattr(model, "predict_proba"):
            try:
                proba = model.predict_proba(scaled)[0]
                print("Probabilities:", proba)  # 🔍 Cek output proba
                confidence = float(max(proba))
            except Exception as e:
                print("Error saat predict_proba:", e)

        return jsonify({
            'hasil': hasil,
            'confidence': confidence
        })
    except Exception as e:
        return jsonify({'error': str(e)}), 500

if __name__ == '__main__':
    app.run(port=5000, debug=True)
