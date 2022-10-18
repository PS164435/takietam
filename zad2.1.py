from typing import Any

class Node:
    value: Any
    next: "Node"

    def __init__(self, value: Any) -> None:
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
        current = self.head
        nodes = []
        while current:
            nodes.append(str(current.value))
            current = current.next
        return " -> ".join(nodes)

    def __len__(self):
        count = 0
        current = self.head
        while current:
            count += 1
            current = current.next
        return count

    def push(self, value: Any) -> None:
        if self.head == None:
            self.head = Node(value)
            self.tail = Node(value)
        else:
            newNode = Node(value)
            newNode.next = self.head
            self.head = newNode

    def append(self, value: Any) -> None:
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

    def insert(self, value: Any, after: Node) -> None:
        newNode = Node(value)
        x = 0
        p = self.head
        while x != after:
            p = p.next
            x += 1
        newNode.next = p.next
        p.next = newNode

    def pop(self) -> Any:
        p = self.head
        self.head = self.head.next
        return p

    def remove_last(self) -> Any:
        p = self.head
        while p.next.next != None:
            p = p.next
        q = p
        p.next = p.next.next
        return q

    def remove(self, after: Node) -> Any:
        x = 0
        p = self.head
        while x != after:
            p = p.next
            x += 1
        p.next = p.next.next

test1=LinkedList()

test1.push(10)
test1.append(9)
test1.append(8)
test1.append(7)
test1.push(3)
test1.push(3)
test1.push(2)

print(test1)

print(test1.node(2))

test1.insert(0,after=3)
print(test1)

test1.pop()
print(test1)

test1.remove_last()
print(test1)

test1.remove(0)
print(test1)