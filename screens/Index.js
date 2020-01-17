import React from 'react';
import { StyleSheet, Text, View } from 'react-native';
import { createAppContainer } from 'react-navigation';
import { createStackNavigator } from 'react-navigation-stack';

import Home from '../screens/Home';
import Details from '../screens/Details';

const HomeStack = createStackNavigator(
    {
        Home: { screen: Home },
        Details: { screen: Details }
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
