import sys
import joblib
import numpy as np
import os

# Ambil input dari argument
features = list(map(float, sys.argv[1:]))
data_baru = np.array([features])

# Load scaler dan model (dibalik dari sebelumnya)
BASE_DIR = os.path.dirname(__file__)
scaler = joblib.load(os.path.join(BASE_DIR, 'scaler.joblib'))
model = joblib.load(os.path.join(BASE_DIR, 'best_model_svm.joblib'))

# Normalisasi & prediksi
data_scaled = scaler.transform(data_baru)
pred = model.predict(data_scaled)

# Output hasil prediksi
print("Layak" if pred[0] == 0 else "Tidak Layak")
