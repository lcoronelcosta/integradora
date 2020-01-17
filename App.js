import React from 'react';
import { StyleSheet, Text, View } from 'react-native';
import { createAppContainer } from 'react-navigation';
import { createStackNavigator } from 'react-navigation-stack';
import { createBottomTabNavigator } from 'react-navigation-tabs';

import Home from './screens/Home';
import Details from './screens/Details';
import Subcategorias from './screens/Subcategorias';

const HomeStack = createStackNavigator(
    {
        Home: { screen: Home },
        Details: { screen: Details },
        Subcategorias: { screen: Subcategorias }
    }
);

const HomeContainer = createAppContainer(HomeStack);

export default class App extends React.Component {
    render() {
        return (
            <HomeContainer />
        );
    }
}