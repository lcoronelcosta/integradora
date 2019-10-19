import React from 'react';
import { StyleSheet, Text, View } from 'react-native';
import Component1 from './components/Component1.js';

export default function App() {
  return (
    <View style={styles.container}>
      <Component1 />
      <Text>Open up App.js to start working on your app!</Text>
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
