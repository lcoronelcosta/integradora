import React from 'react';
import { FlatList, ActivityIndicator, Text, View  } from 'react-native';
import {
  Card, Button, CardImg, CardTitle, CardText, CardGroup,
  CardSubtitle, CardBody
} from 'reactstrap';

export default class GetSubcategorias extends React.Component {

  constructor(props){
    super(props);
    this.state ={ isLoading: true}
  }

  componentDidMount(){
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



  render(){

    if(this.state.isLoading){
      return(
        <View style={{flex: 1, padding: 20}}>
          <ActivityIndicator/>
        </View>
      )
    }

    return(
      <View style={{flex: 1, paddingTop:20, alignItems: 'center', justifyContent: 'center',
    padding: 20, marginVertical: 8, marginHorizontal: 16}}>
        <FlatList
          data={this.state.dataSource}
          
          renderItem={
            ({
              item
            }) => <div style={{paddingTop:20}}>
                      <Card>
                        <CardImg top width="100%" src={item.imagen} alt="Card image cap" />
                        <CardBody>
                          <CardTitle>{item.nombre}</CardTitle>
                        </CardBody>
                      </Card>
                  </div>
          }
          
          
        />
      </View>
    );

    
  }
}
