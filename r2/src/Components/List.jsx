import Row from "./Row";

function List({mushrooms, setLastUpdate, setEditMushroom}) {

    return (
        <ul>
        {
            mushrooms.map(m => <Row mushroom={m} setLastUpdate={setLastUpdate} setEditMushroom={setEditMushroom} key={m.id}/>)
        }
        </ul>
    );

}

export default List;