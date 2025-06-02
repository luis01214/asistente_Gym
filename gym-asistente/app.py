import streamlit as st
import requests

st.title("Registrar nuevo usuario")

name = st.text_input("Nombre")
email = st.text_input("Correo electrónico")
password = st.text_input("Contraseña", type="password")

if st.button("Enviar"):
    if name and email and password:
        data = {
            "name": name,
            "email": email,
            "password": password
        }
        try:
            response = requests.post("http://127.0.0.1:8000/api/usuarios", json=data)
            if response.status_code == 201:
                st.success("Usuario creado correctamente")
                st.json(response.json())
            else:
                st.error(f"Error al crear usuario: {response.status_code}")
                st.json(response.json())
        except Exception as e:
            st.error(f"Error de conexión: {e}")
    else:
        st.warning("Todos los campos son obligatorios")
