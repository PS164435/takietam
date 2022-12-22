from enum import Enum
from typing import Any
from typing import Optional
from typing import Dict, List
from typing import Callable
from klasydodo import Queue


class EdgeType(Enum):
    directed = 1
    undirected = 2


class Vertex:
    data: Any
    index: int

    def __init__(self, data, index = 0) -> None:
        self.data = data
        self.index = index


class Edge:
    source: Vertex
    destination: Vertex
    weight: Optional[float]

    def __init__(self, source, destination, weight) -> None:
        self.source = source
        self.destination = destination
        self.weight = weight


class Graph:
    adjacencies: Dict[Vertex, List[Edge]]

    def __init__(self, adjacencies: Dict[Vertex, List[Edge]]) -> None:
        self.adjacencies = adjacencies

    def create_vertex(self, data: Any) -> Vertex:
        self.adjacencies.add(Vertex(data))

    def add_directed_edge(self, source: Vertex, destination: Vertex, weight: Optional[float] = None) -> None:
        Edge(source, destination, weight)

    def add_undirected_edge(self, source: Vertex, destination: Vertex, weight: Optional[float] = None) -> None:
        Edge(source, destination, weight)
        Edge(destination, source, weight)

    def add(self, edge: EdgeType, source: Vertex, destination: Vertex, weight: Optional[float] = None) -> None:
        if edge == 1:
            self.add_directed_edge(source, destination, weight)
        if edge == 2:
            self.add_undirected_edge(source, destination, weight)

    def traverse_breadth_first(self, visit: Callable[[Any], None]) -> None:
        self.visit





