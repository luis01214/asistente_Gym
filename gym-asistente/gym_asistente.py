import streamlit as st
import requests

st.title("Asistente Virtual del Gimnasio")

try:
    response = requests.get("http://127.0.0.1:8000/api/ejercicios")
    response.raise_for_status()

    st.text("Respuesta cruda de la API:")
    st.code(response.text)  # 👈 Muestra el texto sin intentar convertir a JSON

    data = response.json()  # Solo intenta esto si el texto es JSON válido

    st.success("✅ Datos cargados exitosamente")
    for ejercicio in data:
        st.subheader(ejercicio['nombre'])
        st.write(f"Series: {ejercicio['series']}")
        st.write(f"Repeticiones: {ejercicio['repeticiones']}")
        st.write(f"Descanso: {ejercicio['descanso']}")

except requests.exceptions.RequestException as e:
    st.error(f"❌ No se pudo conectar con la API de Laravel.\n\n{e}")
except ValueError as ve:
    st.error(f"❌ La API no devolvió JSON válido.\n\n{ve}")
