import React from 'react';
import { FlatList, ActivityIndicator, Text, View, ScrollView  } from 'react-native';
import { Card, ListItem, Button, List, SearchBar, Header } from 'react-native-elements';

export default class Subcategorias extends React.Component {

    static navigationOptions = {
      title: 'Subcategorias',
      headerStyle: {
        backgroundColor: '#f4511e',
      },
      headerTintColor: '#fff',
      headerTitleStyle: {
        fontWeight: 'bold',
      },
    };

    constructor(props){
        super(props);
        this.state ={ isLoading: true};
        
    }

    componentDidMount(){
        const item = this.props.navigation.state.params;
        
        //return fetch(`http://hierrodiseno.com/mipedido/public/api/getsubcategorias/?id_categoria=${item}`);
        return fetch('http://hierrodiseno.com/mipedido/public/api/getsubcategorias')

          .then((response) => response.json())
          .then((responseJson) => {

            this.setState({
              isLoading: false,
              dataSource: responseJson.data,
            }, function(){
              console.error(responseJson.data);
            });

          })
          .catch((error) =>{
            console.error(error);
        });
    }

    render() {
        if(this.state.isLoading){
          return(
            <View style={{flex: 1, padding: 20}}>
              <ActivityIndicator/>
            </View>
          )
        }
        return (
            <View style={{ flex: 1, paddingTop:20 }}>
            <ScrollView>
                <FlatList
                    data={this.state.dataSource}
                    keyExtractor={(item) => item.id.toString()}
                    renderItem={({ item }) => (
                        <ListItem
                          roundAvatar
                          title={item.nombre}
                          subtitle={item.nombre}
                          leftAvatar={{ source: { uri: item.imagen } }}
                          containerStyle={{ borderBottomWidth: 0 }}
                          onPress={() => this.handleItemClick(item)}
                          
                          chevron
                        />
                      )}
                />
                </ScrollView>
                
            </View>

        );
    }

    handleItemClick = (item) => {
        this.props.navigation.navigate('Details', item);
    }
}