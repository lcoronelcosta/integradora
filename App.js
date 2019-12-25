import React from 'react';
import { StyleSheet, Text, View } from 'react-native';
import GetSubcategorias from './components/subcategorias/GetSubcategorias.js';
import Menu from './components/menu/menu.js';
import { Button } from 'reactstrap';
import 'bootstrap/dist/css/bootstrap.min.css';

export default function App() {
  return (
    <View style={styles.container}>
      <Menu />
      <Button color="danger">CATEGORIAS MAS DESTACADAS</Button>
      <GetSubcategorias />
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
    alignItems: 'center',
    justifyContent: 'center',
  },
});
