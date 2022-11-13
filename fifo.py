class Node:
    value: any
    next: "Node"

    def __init__(self, value: any) -> None:
        self.value = value
        self.next = None

    def __repr__(self):
        return str(self.value)


class LinkedList:
    head: Node
    tail: Node

    def __init__(self) -> None:
        self.head = None
        self.tail = None

    def __repr__(self):
        p = self.head
        nodes = []
        while p != None:
            nodes.append(str(p.value))
            p = p.next
        return " -> ".join(nodes)

    def __len__(self):
        x = 1
        p = self.head
        while p.next != None:
            x += 1
            p = p.next
        return x

    def push(self, value: any) -> None:
        if self.head == None:
            self.head = Node(value)
            self.tail = Node(value)
        else:
            newNode = Node(value)
            newNode.next = self.head
            self.head = newNode

    def append(self, value: any) -> None:
        if self.head == None:
            self.head = Node(value)
            self.tail = Node(value)
        else:
            p = self.head
            while p.next != None:
                p = p.next
            newNode = Node(value)
            newNode.next = None
            self.tail = newNode
            p.next = newNode

    def node(self, at: int) -> Node:
        x = 0
        p = self.head
        while x != at:
            p = p.next
            x += 1
        return p

    def insert(self, value: any, after: Node) -> None:
        newNode = Node(value)
        x = 0
        p = self.head
        while x != after:
            p = p.next
            x += 1
        newNode.next = p.next
        p.next = newNode

    def pop(self) -> any:
        p = self.head
        self.head = self.head.next
        return p

    def remove_last(self) -> any:
        p = self.head
        while p.next.next != None:
            p = p.next
        q = p.next
        p.next = p.next.next
        return q

    def remove(self, after: Node) -> any:
        x = 0
        p = self.head
        while x != after:
            p = p.next
            x += 1
        p.next = p.next.next


class Queue:
    kolejka: LinkedList()

    def __init__(self) -> None:
        self.kolejka = LinkedList()

    def __repr__(self):
        p = self.kolejka.head
        nodes = []
        while p != None:
            nodes.append(str(p.value))
            p = p.next
        return ", ".join(nodes)

    def __len__(self):
        x = 0
        p = self.kolejka.head
        while p != None:
            x += 1
            p = p.next
        return x

    def enqueue(self, element: any) -> None:
        self.kolejka.append(element)

    def dequeue(self) -> any:
        q = self.kolejka.head
        self.kolejka.pop()
        return q

    def peek(self) -> any:
        return self.kolejka.head
