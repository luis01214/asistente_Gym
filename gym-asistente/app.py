import streamlit as st
import requests

st.title("Asistente Virtual del Gimnasio")

try:
    # Asegúrate de que el backend esté corriendo y el endpoint exista
    response = requests.get("http://127.0.0.1:8000/api/ejercicios")
    response.raise_for_status()
    data = response.json()

    for ejercicio in data:
        st.subheader(ejercicio['nombre'])
        st.write(f"Series: {ejercicio['series']}")
        st.write(f"Repeticiones: {ejercicio['repeticiones']}")
        st.write(f"Descanso: {ejercicio['descanso']}")
except requests.exceptions.RequestException as e:
    st.error(f"❌ Error de conexión: {e}")
except ValueError as ve:
    st.error(f"❌ La respuesta no es JSON válido: {ve}")
