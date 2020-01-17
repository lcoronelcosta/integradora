import React from 'react';
import { View, Text, FlatList, FormInput, ActivityIndicator } from 'react-native';
import { Card, ListItem, FormLabel, Button, Image, PricingCard } from 'react-native-elements';
import { Collapse, Navbar, NavbarToggler, NavbarBrand, Nav, NavItem, NavLink } from 'reactstrap';

class Details extends React.Component {
  static navigationOptions = {
      title: 'Detalle',
      headerStyle: {
        backgroundColor: '#f4511e',
      },
      headerTintColor: '#fff',
      headerTitleStyle: {
        fontWeight: 'bold',
      },
    };
    render() {

        const item = this.props.navigation.state.params;

        return (
            <View style={{ flex: 1, justifyContent: 'center', alignItems: 'center' }}>
                <Card title={item.nombre}>
                    <Image
                      source={{ uri: item.imagen }}
                      style={{ width: 300, height: 300, justifyContent: 'center' }}
                      PlaceholderContent={<ActivityIndicator />}
                    />
                    <PricingCard
                     color="#4f9deb"
                     price="$0"
                     //info={['1 User', 'Basic Support', 'All Core Features']}
                     button={{ title: 'Pedir', icon: 'flight-takeoff' }}
                    />
                </Card>

                
            </View>
        );
    }
}

export default Details;