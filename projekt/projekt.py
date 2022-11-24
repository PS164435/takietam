import queue
from typing import Any, List, Callable, Union
import graphviz

pic = graphviz.Digraph(comment="Drzewo", format='png')

class TreeNode:
    value: Any
    children: List['TreeNode']

    def __init__(self, value: Any) -> None:
        self.value = value
        self.children = []

    def __str__(self) -> str:
        return str(self.value)

    def is_leaf(self) -> bool:
        if self.children:
            return False
        return True

    def add(self, child: 'TreeNode') -> None:
        self.children.append(child)

    def for_each_deep_first(self, visit: Callable[['TreeNode'], None]) -> None:
        visit(self)
        for child in self.children:
            child.for_each_deep_first(visit)

    def for_each_level_order(self, visit: Callable[['TreeNode'], None]) -> None:
        tym = queue.Queue()
        visit(self)
        for child in self.children:
            tym.put(child)
        while tym:
            tymm = tym.get()
            visit(tymm)
            for child in tymm.children:
                tym.put(child)
            if tym.empty():
                return

    def search(self, value: Any) -> Union['TreeNode', None]:
        if self.value == value:
            return self
        for child in self.children:
            tym = child.search(value)
            if tym is not None:
                return tym

    def addChildrenToGraph(self):
        if self.is_leaf():
            return
        for child in self.children:
            pic.node(str(child.value))
            pic.edge(str(self.value), str(child.value))
            child.addChildrenToGraph()


class Tree:
    root: TreeNode

    def __init__(self, value: Any) -> None:
        self.root = TreeNode(value)

    def add(self, value: Any, parent_name: Any) -> None:
        tym = self.root.search(parent_name)
        tym.add(TreeNode(value))

    def for_each_level_order(self, visit: Callable[['TreeNode'], None]) -> None:
        self.root.for_each_level_order(visit)

    def for_each_deep_first(self, visit: Callable[['TreeNode'], None]) -> None:
        self.root.for_each_deep_first(visit)

    def show(self):
        pic.node(self.root.value)
        self.root.addChildrenToGraph()
        pic.view('picture')


p1 = TreeNode("B")
p2 = TreeNode("G")
p3 = TreeNode("A")
p4 = TreeNode("D")
p5 = TreeNode("I")
p6 = TreeNode("C")
p7 = TreeNode("E")
p8 = TreeNode("H")

tree = Tree("F")
tree.add(p1, "F")
tree.add(p2, "F")
tree.add(p3, p1)
tree.add(p4, p1)
tree.add(p6, p4)
tree.add(p7, p4)
tree.add(p5, p2)
tree.add(p8, p5)

tree.show()

print(p6.is_leaf())
tree.for_each_deep_first(print)
print("--------------")
tree.for_each_level_order(print)
print("--------------")
print(p4.search("D"))