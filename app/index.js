import react, { useEffect, useState } from "react";
import { Image, Modal, SafeAreaView, Text, TextInput, View, FlatList } from "react-native";
import { Header, Container, Exercises, ExercisesText, ContentText, ExercisesTextMini, StyledButton, ContentGoals, DescriptionPayment } from "./styles.js";
import { CGT } from "../../../components/TextGradient";
import { Feather } from '@expo/vector-icons';
import api from "../../../services/api.js";
import Svg, { Path } from "react-native-svg";
import { MaterialCommunityIcons } from '@expo/vector-icons';

export function WorkoutExercise({ route, navigation }) {
    const { typeExercises, resumeExercises } = route?.params;
    const [workoutData, setWorkoutData] = useState([]);

    const [isModalVisible, setModalVisible] = useState(false);
    const [selectedExerciseIndex, setSelectedExerciseIndex] = useState(null);
    const [newWeight, setNewWeight] = useState('');

    const openModal = (index, weight) => {
        setSelectedExerciseIndex(index);
        setNewWeight(weight.toString());
        setModalVisible(true);
    };

    // const handleWeightChange = (exerciseIndex, newWeight) => {
    //     const updatedWorkoutData = [...workoutData];
    //     updatedWorkoutData[exerciseIndex].exercises[exerciseIndex].weight = newWeight;
    //     setWorkoutData(updatedWorkoutData);
    // };

    useEffect(() => {
        async function fetchWorkoutData() {
            try {
                const response = await api.get('/training-exercises');
                const filteredData = response.data.filter(exercise => exercise.training.typeExercises === typeExercises);
                setWorkoutData(filteredData);
            } catch (error) {
                console.error('Error fetching workout data:', error);
            }
        }

        fetchWorkoutData();
    }, [typeExercises]);

    const renderItem = ({ item, index }) => (
        <Exercises>
            <View style={{ width: '30%', alignItems: 'center', justifyContent: 'center', height: '100%' }}>
                <Image source={{ uri: item.image }} style={{ width: '90%', height: '90%', resizeMode: 'contain' }} />
            </View>
            <View style={{ width: '50%', alignItems: 'center', justifyContent: 'center' }}>
                <CGT style={{ fontWeight: 'bold', fontSize: 16, alignSelf: 'center', textAlign: 'center' }}>{item.name}</CGT>
                <View style={{ flexDirection: 'row', justifyContent: 'space-around', width: '100%' }}>
                    <ContentText>
                        <ExercisesText>{item.sets}</ExercisesText>
                        <ExercisesTextMini>Sets</ExercisesTextMini>
                    </ContentText>
                    <ContentText>
                        <ExercisesText>{item.reps}</ExercisesText>
                        <ExercisesTextMini>Reps</ExercisesTextMini>
                    </ContentText>
                    <ContentText>
                        <ExercisesText>{item.weight}</ExercisesText>
                        <ExercisesTextMini>Weight</ExercisesTextMini>
                    </ContentText>
                </View>
            </View>
            <View style={{ width: '20%', alignItems: 'center', justifyContent: 'center' }}>
                <Feather
                    name="trending-up"
                    size={30}
                    color="#a82c8d"
                    onPress={() => openModal(index, item.weight)}
                />
                <CGT style={{ fontSize: 11, }}>Up Weight</CGT>
            </View>
        </Exercises>
    );

    return (
        <SafeAreaView style={{ flex: 1 }}>
            <Header>
                <Text style={{ color: 'white', fontSize: 20, fontWeight: 'bold', marginLeft: '5%' }}>Training: {typeExercises}</Text>
                <Text style={{ color: 'white',fontWeight: 'bold', marginRight: '5%'  }}>{resumeExercises}</Text>
            </Header>
            <Container>
            <ContentGoals>
                    <View style={{ alignItems: 'flex-start', width: '30%' }}>
                        <CGT style={{ fontWeight: 'bold' }}>Goal</CGT>
                        {/* <Text style={{ fontSize: 12 }}>{lastPhysicalEvaluation.goals}</Text> */}
                    </View>
                    <DescriptionPayment>
                        <Svg
                            width="40px"
                            height="40px"
                            viewBox="0 0 16 16"
                            xmlns="http://www.w3.org/2000/svg"
                            className="bi bi-coin"
                        >
                            <Path fill="white" d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z" />
                            <Path fill="white"
                                fillRule="evenodd"
                                d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z"
                            />
                            <Path fill="white"
                                fillRule="evenodd"
                                d="M8 13.5a5.5 5.5 0 100-11 5.5 5.5 0 000 11zm0 .5A6 6 0 108 2a6 6 0 000 12z"
                            />
                        </Svg>
                    </DescriptionPayment>
                    <View style={{ alignItems: 'flex-end', width: '30%' }}>
                        <CGT style={{ fontWeight: 'bold' }}>Start date</CGT>
                        {/* <Text style={{ fontSize: 12 }}>{lastPhysicalEvaluation.evaluation_date}</Text> */}
                    </View>
                </ContentGoals>
                <FlatList
                    data={workoutData}
                    renderItem={renderItem}
                    keyExtractor={item => item.id}
                    contentContainerStyle={{ paddingBottom: 50, width: '90%',marginTop: '5%'}}
                />
            </Container>

            <Modal
                animationType="slide"
                transparent={true}
                visible={isModalVisible}
                onRequestClose={() => {
                    setModalVisible(!isModalVisible);
                }}
            >
                {/*desfoque*/}
                <View style={{ flex: 1, backgroundColor: 'rgba(0, 0, 0, 0.5)', justifyContent: 'center', alignItems: 'center' }}>
                    <View style={{ margin: 20, backgroundColor: 'white', borderRadius: 20, padding: 35, alignItems: 'center', shadowColor: '#000', shadowOffset: { width: 0, height: 2 }, shadowOpacity: 0.25, shadowRadius: 3.84, elevation: 5 }}>
                        <TextInput
                            style={{ height: 40, borderEndColor: 'green', width: 80, marginBottom: 20, textAlign: 'center', fontSize: 18 }}
                            onChangeText={setNewWeight}
                            value={newWeight}
                            keyboardType="numeric"
                        />
                        <View style={{ flexDirection: 'row' }}>
                            <StyledButton
                                style={{ marginRight: 10 }}
                                onPress={() => {
                                    handleWeightChange(selectedExerciseIndex, newWeight);
                                    setModalVisible(!isModalVisible);
                                }}
                            >
                                <CGT>Update </CGT>
                            </StyledButton>
                            <StyledButton
                                onPress={() => {
                                    setModalVisible(!isModalVisible);
                                }}
                            >
                                <CGT>Cancel </CGT>
                            </StyledButton>
                        </View>
                    </View>
                </View>
            </Modal>

        </SafeAreaView>
    )
}