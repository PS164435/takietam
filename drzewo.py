from typing import List
from typing import Callable
from typing import Union
import queue

class TreeNode:
    value: any
    children: List['TreeNode']
    parent: 'TreeNode'

    def __init__(self, value) -> None:
        self.value = value
        self.children = []
        self.parent = None

    def __str__(self) -> str:
        return str(self.value)

    def is_leaf(self) -> bool:
        return self.children == []

    def add(self, child: 'TreeNode') -> None:
        self.children.append(child)
        child.parent = self

    def for_each_deep_first(self, visit: Callable[['TreeNode'], None]) -> None:
        visit(self)
        for x in self.children:
            x.for_each_deep_first(visit)

    def for_each_level_order(self, visit: Callable[['TreeNode'], None]) -> None:
        visit(self)
        q = queue.Queue()
        for x in self.children:
            q.put(x)
        while q.qsize()>0:
            s = q.get()
            visit(s)
            for x in s.children:
                q.put(x)

    def search(self, value: any) -> Union['TreeNode', None]:
        if self.value == value:
            return self.value
        for x in self.children:
            p = x.search(value)
            if p is not None:
                return p


class Tree:
    root: TreeNode

    def __init__(self, root) -> None:
        self.root = None

    def add(self, value: any, parent_name: any) -> None:
        self.root.search(parent_name).add(TreeNode(value))

    def for_each_level_order(self, visit: Callable[['TreeNode'], None]) -> None:
        self.root.for_each_level_order(visit)

    def for_each_deep_first(self, visit: Callable[['TreeNode'], None]) -> None:
        self.root.for_each_deep_first(visit)

    def __repr__(self):
        x = self.root
        p = []
        while x.children != None:
            p.append(str(p.value))
            p = p.next
        return " -> ".join(p)


tn1 = TreeNode(1)
print(tn1, tn1.children, tn1.parent)
print(tn1.is_leaf())
tn11 = TreeNode(11)
tn1.add(tn11)
print(tn1, tn1.children[0], tn1.parent)
print(tn11, tn11.children, tn11.parent)
print(tn1.is_leaf())
print(tn11.is_leaf())
tn12 = TreeNode(12)
tn111 = TreeNode(111)
tn112 = TreeNode(112)
tn1.add(tn12)
tn11.add(tn111)
tn11.add(tn112)
print("for_each_deep_first tn1:")
tn1.for_each_deep_first(print)
print("for_each_deep_first tn11:")
tn11.for_each_deep_first(print)
print("for_each_level_order tn1:")
tn1.for_each_level_order(print)
print("for_each_level_order tn11:")
tn11.for_each_level_order(print)
print("search:")
print(tn1.search(1))
print(tn1.search(11))
print(tn1.search(112))
print(tn1.search(113))

print("=====dzrzewo=====")
d1 = Tree(tn1)
print(d1)


