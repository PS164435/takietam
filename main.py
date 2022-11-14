from typing import List
from collections.abc import Callable
from typing import Union
from fifo import Node, LinkedList, Queue

class TreeNode:
    value: any
    children: List['TreeNode']
    rodzic: 'TreeNode'

    def __init__(self, value) -> None:
        self.value = value
        self.children = None
        self.rodzic = None

    def __str__(self) -> str:
        return str(self.value)

    def is_leaf(self) -> bool:
        return self.children is None

    def add(self, child: 'TreeNode') -> None:
        if self.children is None:
            self.children = []
        self.children.append(child)
        child.rodzic = self

    def for_each_deep_first(self, visit: Callable[['TreeNode'], None]) -> None:
        visit(self)
        x = 0
        while self.children is not None and x<len(self.children):
            self.children[x].for_each_deep_first(visit)
            x+=1

    def for_each_level_order(self, visit: Callable[['TreeNode'], None]) -> None:
        visit(self)
        q = Queue()
        for x in self.children:
            q.enqueue(x)
        while len(q)>0:
            s = q.dequeue()
            visit(s)

    def search(self, value: any) -> Union['TreeNode', None]:
        x = 0
        while self.children is not None and x < len(self.children):
            if self.children[x].value == value:
                return Union[("zawiera")]
            x += 1
        return Union[("nie_zawiera")]


class Tree:
    root: TreeNode

    def __init__(self, root) -> None:
        self.root = None

   # def add(value: Any, parent_name: Any) -> None:

      #  root.children.value = value


tn1 = TreeNode(11)
print(tn1)
print(tn1.children)
print(tn1.is_leaf())
tn1.add(TreeNode(21))
print(tn1.children[0])
tn1.add(TreeNode(22))
print(tn1.children[0])
print(tn1.children[1])
print(tn1.is_leaf())
print(tn1.children[0].is_leaf())
tn1.children[0].add(TreeNode(31))
tn1.children[0].add(TreeNode(32))
print(tn1.children[0].is_leaf())
print(tn1.children[1].is_leaf())
print(tn1.children[0].children[1])
print(tn1.children[0].rodzic)
print("teraz skoki")
tn1.for_each_deep_first(print)
tn1.children[0].for_each_deep_first(print)
tn1.children[0].children[1].for_each_deep_first(print)
print("teraz skoki 2")
tn1.for_each_level_order(print)
print("teraz union")
print(tn1.search(22))
print(tn1.search(32))
print(tn1.search(42))